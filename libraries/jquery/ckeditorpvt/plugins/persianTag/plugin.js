CKEDITOR.plugins.add( 'persianTag', {
  icons: 'pcode',
  init: function( editor ) {
    editor.addCommand( 'persianCode', {
      exec: function( editor ) {
        editor.insertHtml( '<code>' + editor.getSelection().getSelectedText() + '</code>' );
      }
    });
    editor.ui.addButton( 'Pcode', {
      label: 'Persian Charachter',
      command: 'persianCode',
      toolbar: 'Farsi'
    });
  }
});