tinymce.init({
    selector: 'textarea.tinymce',
    content_css: '/css/tinymce.css',
    height: 250,
    width: '99%',
    statusbar: false,
    menubar: false,
    plugins: 'textcolor link image emoticons',
    toolbar: [
    	'undo redo bold italic underline fontsizeselect alignleft aligncenter alignright',
    	'bullist numlist forecolor backcolor link image emoticons'
    ]
});