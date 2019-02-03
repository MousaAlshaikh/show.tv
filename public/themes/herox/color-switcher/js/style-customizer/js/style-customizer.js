/* @author Tigran Sargsyan <tigran.sn@gmail.com> */

/* jshint globalstrict: true, browser: true, jquery: true */
/* global less */

'use strict';

// Less variables
var lessVars = {
	'colorPrimary': '#ff6666',
	'colorSecondary': '#b2c81e',
};

var styleCustomizer = {
	files: {

	},

	changeVar: function(key, value, el) {
		switch(key) {
		case 'outerBgType':
			if(!this.files.outerBgImage) {
				if(value === 'pattern') {
					lessVars.outerBgImage = '../images/bg-pattrens/pattren-bg.png';
				} else if (value === 'image') {
					lessVars.outerBgImage = '../images/bg-pattrens/bg1.jpg';
				}
			}
			break;
		case 'outerBgImage':
			if(el.files.length) {
				this.files.outerBgImage = el.files[0];
				value = URL.createObjectURL(el.files[0]);
			} else {
				return;
			}
			break;
		}

		lessVars[key] = value;
		this.changeVars(lessVars);
		this.onVarChange(key, value, el);
	},

	changeVars: function(vars) {
		var quotedVars = [
			'outerBgImage',
			'layoutType',
			'borderType',
			'outerBgType',
			'preloader'
		];
		vars = $.extend({}, vars);
		quotedVars.forEach(function(key) {
			vars[key] = '"' + vars[key] + '"';
		});
		less.modifyVars(vars);
	},

	onVarChange: function(key, value, element) {},

	downloadCssFile: function() {
		var link, file;

		file = new Blob([this._getCssText()], {type: 'text/css'});
		link = document.createElement('a');
		link.href = URL.createObjectURL(file);
		link.style.display = 'none';
		link.download = 'color.css';
		document.body.appendChild(link);
		link.click();
		document.body.removeChild(link);

		$('.sc-after-save-todo-point-image').toggle(lessVars.layoutType === 'boxed' && !!this.files.outerBgImage);
		$('.sc-after-save-todo-point-preloader').toggle(lessVars.preloader !== '');
		$('#afterSaveCSSFileModal').modal('show');
	},

	_getCssText: function() {
		var css;

		css = document.querySelector('style[id^="less:"]');
		if(!css) {
			alert('Error: css file not generated');
			throw new Error('Error: css file not generated');
		}
		css = css.innerHTML;
		if(this.files.outerBgImage) {
			css = css.replace(/url\("blob:[^"]+"\)/, 'url("../images/bg-pattrens/' + this.files.outerBgImage.name + '")');
		}
		return css;
	}

};


// Listen to variable controls changes
$('.sc-variable').change(function(e) {
	styleCustomizer.changeVar(this.dataset.key, this.value, this);
});

// Toggle styles customizer
$('#sc-toggle').click(function(e) {
	$('#style-customizer').toggleClass('expanded');
});

if(navigator.userAgent.indexOf('Trident') !== -1) {
	$('#sc-download-css').after('<p><strong class="text-danger">File download is not supported in Internet Explorer.</strong></p>');
}
$('#sc-download-css').click(function(e) {
	styleCustomizer.downloadCssFile();
});

// Fill in the variables into controls
$('.sc-variable').each(function() {
	if(this.dataset.key === 'outerBgImage') return;

	if(this.type === 'radio') {
		this.checked = this.value === lessVars[this.dataset.key];
	} else {
		this.value = lessVars[this.dataset.key];
	}
});
