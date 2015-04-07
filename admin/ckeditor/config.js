/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	//config.filebrowserUploadUrl = '../ckupload.php'; - easy;
	//config.language = 'fr';
	//config.uiColor = '#AADC6E';
config.filebrowserBrowseUrl = 'kcfinder/browse.php?type=files';
config.filebrowserImageBrowseUrl = 'kcfinder/browse.php?type=images';
config.filebrowserFlashBrowseUrl = 'kcfinder/browse.php?type=flash';
config.filebrowserUploadUrl = 'kcfinder/upload.php?type=files';
config.filebrowserImageUploadUrl = 'kcfinder/upload.php?type=images';
config.filebrowserFlashUploadUrl = 'kcfinder/upload.php?type=flash';
	config.language = 'es';
	config.uiColor = '#f9f9f9';
	config.skin = 'kama';
	config.enterMode = CKEDITOR.ENTER_BR;
	//config.colorButton_colors = '4A5A73,c54747,00773d,555555';
	config.height = '150px';
	config.width = '500px';
//	config.basePath = '/ckeditor/';
	config.resize_enabled = false;

config.toolbar_Basic = [
['Bold','Italic'],['Format'],['Cut','Copy','Paste'],['SpellChecker', 'Scayt'],
['Undo','Redo'],['Image','Table'],['NumberedList','BulletedList'],
['Link','Unlink'],['Find','Replace','-','SelectAll','RemoveFormat'],['Maximize'],['SwitchBar']
];
config.toolbar_Full = [
['Bold','Italic','Underline','Strike','-',],
['Format','Font','FontSize','FontColor', 'TextColor'],
['PasteText','PasteFromWord'],
['SpellChecker', 'Scayt'],
['Table','SpecialChar','-', 'Outdent', 'Indent', 'Blockquote'],
['NumberedList','BulletedList'],
['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
['Link','Unlink','Source'],['Upload'],['Image'],['Undo','Redo'],
['Find','Replace','-','SelectAll','RemoveFormat'],['Maximize'],['SwitchBar'],['FileTypesPath'],['QuickUploadAbsolutePath']
];
	
};