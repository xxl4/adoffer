/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

 CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#000';
	config.toolbarGroups = [
	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
	{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
	{ name: 'forms', groups: [ 'forms' ] },
	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
	{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
	'/',
	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
	{ name: 'links', groups: [ 'links' ] },
	{ name: 'insert', groups: [ 'insert' ] },
	'/',
	{ name: 'styles', groups: [ 'styles' ] },
	{ name: 'colors', groups: [ 'colors' ] },
	{ name: 'tools', groups: [ 'tools' ] },
	{ name: 'others', groups: [ 'others' ] },
	{ name: 'about', groups: [ 'about' ] }
	];

	if(switch_theme == true){
		config.skin = 'prestige';
		config.contentsCss = [ 'css/content_dark.css' ];
	}

	config.removeButtons = 'About,Flash,Smiley,PageBreak,Iframe,Anchor,Language,HiddenField,ImageButton,Button,Select,Textarea,TextField,Radio,Checkbox,Form,Replace,Find,Redo,Undo,Cut,PasteText,PasteFromWord,Templates,Save,NewPage,Preview,Print,Scayt,BidiLtr,BidiRtl,Styles,Format,Font,CreateDiv,SpecialChar,Outdent,Indent';
};
