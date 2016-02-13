{include file='header.tpl'}
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.4.0/jsgrid.min.css">
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.4.0/jsgrid-theme.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.4.0/jsgrid.min.js"></script>
<script>
   $(function(){
       $("#dtable").jsGrid({
           width: "100%",
           height: "400px",
           filtering: false,
           editing: false,
           sorting: false,
           paging: false,
           rowClick: function(args) {

           },
           data: {{$cdrs}},
           fields: [
               { name: "caller", type: "text", width: 25,title: "Arayan" },
               { name: "callee", type: "text", width: 25 ,title: "Aranan"},
               { name: "call_time", type: "text", width: 50 ,title: "Arama Zamani"},
               { name: "answer_time", type: "text", width: 50 ,title: "Cevaplanma Zamani"},
           ]
       });
   });

</script>
<div class="bulutfon_wrapper">
    <div class="bulutfon_header">
        Arama Kayitlari
    </div>
    <div class="bulutfon_content no-padding">
        <div id="dtable"></div>
    </div>
    <div class="bulutfon_footer">
        <ul>
            <li><a href="addonmodules.php?module=bulutfon&page={$previous}"><i class="fa fa-chevron-left"></i> Onceki</a></li>
            <li><a href="addonmodules.php?module=bulutfon&page={$next}">Sonraki <i class="fa fa-chevron-right"></i></a></li>
        </ul>
        <div class="clear-fix"></div>
    </div>
 </div>
       
{include file='footer.tpl'}