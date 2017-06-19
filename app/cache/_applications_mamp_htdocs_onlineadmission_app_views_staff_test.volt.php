<div style="display: none;">
<a id="y"  class="more_link" rel="lightbox[x]" href="../files/1b1a2a7e157534e913a0f572afa6ddb5-img_0018.jpg">Test</a>
    <a href="../files/98e9d9e003024662fa8950c33a79d944-img_0013.png" id="6NnvrP9O9w-0" data-ob="lightbox[x]"></a>
<a  class="more_link" rel="lightbox[x]" href="../files/6db332e080762e6f9c315aee04a181ab-hw.pdf">Test</a>
<!-- some other code --->
</div>
<a id="x" href="javascript:t()">Click</a>

<script language="JavaScript">
    function t()
    {
        $("#x").click(function(){
            $("#y").trigger('click');
        })
    }
</script>