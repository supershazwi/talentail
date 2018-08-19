<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/autosize.min.js"></script>
<script type="text/javascript" src="/js/popper.min.js"></script>
<script type="text/javascript" src="/js/prism.js"></script>
<script type="text/javascript" src="/js/draggable.bundle.legacy.js"></script>
<script type="text/javascript" src="/js/swap-animation.js"></script>
<script type="text/javascript" src="/js/dropzone.min.js"></script>
<script type="text/javascript" src="/js/list.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/theme.js"></script>
<script type="text/javascript" src="/js/editormd.js"></script>
<script type="text/javascript" src="/languages/en.js"></script>
<script type="text/javascript">
var testEditor;

$(function() {
    testEditor = editormd("test-editormd", {
        width   : "100%",
        height  : 640,
        syncScrolling : "single",
        path    : "../lib/"
    });
    
    /*
    // or
    testEditor = editormd({
        id      : "test-editormd",
        width   : "90%",
        height  : 640,
        path    : "../lib/"
    });
    */
});
</script>