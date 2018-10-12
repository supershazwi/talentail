<!-- <script type="text/javascript" src="/js/jquery.min.js"></script> -->
<script type="text/javascript" src="/js/autosize.min.js"></script>
<script type="text/javascript" src="/js/popper.min.js"></script>
<script type="text/javascript" src="/js/prism.js"></script>
<script type="text/javascript" src="/js/draggable.bundle.legacy.js"></script>
<script type="text/javascript" src="/js/swap-animation.js"></script>
<script type="text/javascript" src="/js/dropzone.min.js"></script>
<script type="text/javascript" src="/js/list.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/theme.js"></script>
<!-- <script type="text/javascript" src="/js/editormd.js"></script> -->
<script type="text/javascript" src="/js/custom-file-input.js"></script>
<script type="text/javascript" src="/js/toastr.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">

$(function() {
    var editor = editormd({
        id   : "test-editormd",
        path : "/lib/",
        height: 640
    });
});

$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>