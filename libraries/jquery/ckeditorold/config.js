/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    //vtiger editor toolbar configuration
 		    config.removePlugins = 'save,maximize,magicline';
			config.fullPage = true;
 		    config.allowedContent = true;
			config.disableNativeSpellChecker = false;
			config.enterMode = CKEDITOR.ENTER_BR;
			config.shiftEnterMode = CKEDITOR.ENTER_P;
			config.autoParagraph = false;
			config.fillEmptyBlocks = false;
			config.filebrowserBrowseUrl = 'kcfinder/browse.php?type=images';
			config.filebrowserUploadUrl = 'kcfinder/upload.php?type=images';
 	        config.plugins = 'dialogui,dialog,docprops,about,a11yhelp,dialogadvtab,basicstyles,bidi,blockquote,clipboard,button,panelbutton,panel,floatpanel,colorbutton,colordialog,menu,contextmenu,div,resize,toolbar,elementspath,enterkey,entities,popup,filebrowser,find,fakeobjects,floatingspace,listblock,richcombo,font,format,horizontalrule,htmlwriter,wysiwygarea,image,indent,indentblock,indentlist,justify,link,list,liststyle,magicline,pagebreak,preview,removeformat,selectall,showborders,sourcearea,specialchar,menubutton,stylescombo,tab,table,tabletools,undo,wsc';
          config.toolbarGroups = [
        		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
        		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
        		{ name: 'links' },
        		{ name: 'insert' },
        		{ name: 'forms' },
        		{ name: 'tools' },
        		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
        		{ name: 'others' },
        		'/',
        		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
        		{ name: 'styles' },
        		{ name: 'colors' },
                { name: 'Farsi' },
        		{ name: 'about' },
        	];

          config.extraPlugins = 'persianTag';
          config.font_names = "Nazanin/nazanin, tahoma; Yekan/yekan, tahoma; Koodak Farsi/koodak, tahoma; Yekan/yekan, tahoma; Mitra/mitra, tahoma; Lotus/lotus, tahoma; Iranian Sans/iraniansans, tahoma; Titr/xbtitr, tahoma; Traffic/xmtraffic, tahoma; Roya/xbroya, tahoma; Keyhan/xbkeyhan, tahoma; Khoramshahr/xbkhoramshahr, tahoma; Shafigh/xbshafigh, tahoma; Shiraz/xbshiraz, tahoma; Ziba/xbziba, tahoma; Yagut/xbyagut, tahoma; Vahid/xmvahid, tahoma; Tabriz/xbtabriz, tahoma; Sols/xbsols, tahoma; Niloofar/xbniloofar, tahoma; Yermook/xmyermook, tahoma;ZAR/xbzar, tahoma; Riyaz/xbriyaz, tahoma; Tahoma/Tahoma, Geneva, sans-serif; Arial/Arial, Helvetica, sans-serif;Comic Sans MS/Comic Sans MS, cursive;Courier New/Courier New, Courier, monospace;Georgia/Georgia, serif;Lucida Sans Unicode/Lucida Sans Unicode, Lucida Grande, sans-serif; Times New Roman/Times New Roman, Times, serif;Trebuchet MS/Trebuchet MS, Helvetica, sans-serif;Verdana/Verdana, Geneva, sans-serif;";

      	// Set the most common block elements.
      	config.format_tags = 'p;h1;h2;h3;pre';config.allowedContent=true;

};
