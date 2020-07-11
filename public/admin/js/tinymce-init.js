var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host;
tinymce.init({
    selector: '#textFileEditor',
    plugins: 'responsivefilemanager print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount  imagetools  contextmenu colorpicker textpattern help',
    toolbar1: 'undo redo | bold | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat responsivefilemanager',
    image_advtab: true,
    external_filemanager_path: baseUrl + "/lib/filemanager/",
    filemanager_title: "Filemanager",
    external_plugins: {"filemanager": baseUrl + "/lib/filemanager/plugin.min.js"},
    filemanager_access_key: "lB2PK8fl735R7xM849MA50UHFJXpID38",
});