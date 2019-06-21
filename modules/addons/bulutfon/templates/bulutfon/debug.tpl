{include file='../layout/header.tpl'}
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.4.0/jsgrid.min.css">
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.4.0/jsgrid-theme.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.4.0/jsgrid.min.js"></script>
<script>
    $(function(){
        var links = function(value) {
            return '<a href="clientssummary.php?userid='+value+'">'+value+'</a>';
        };
        $("#dtable").jsGrid({
            width: "100%",
            height: "400px",
            filtering: false,
            editing: false,
            sorting: false,
            paging: false,
            rowClick: function(args) {

            },
            data: {{$data}},
            fields: [
                { name: "id", type: "text", width: 5,title: "Log ID"},
                { name: "userid", type: "text", width: 5,title: "Userid" ,itemTemplate: function(value){ return links(value); } },
                { name: "gsm", type: "text", width: 15 ,title: "Telefon Numarasi"},
                { name: "message", type: "text", width: 50 ,title: "Mesaj"},
                { name: "type", type: "text", width: 5 ,title: "Tur"}
            ]
        });
    });

</script>
<div class="bulutfon_wrapper">
    <div class="bulutfon_header">
        Mesaj Loglari
    </div>
    <div class="bulutfon_content no-padding">
        <div id="dtable"></div>
    </div>
    <div class="bulutfon_footer">
        <ul>
            <li><a href="addonmodules.php?module=bulutfon&action=sms&work=debug&page={$previous}"><i class="fa fa-chevron-left"></i> Onceki</a></li>
            <li><a href="addonmodules.php?module=bulutfon&action=sms&work=debug&page={$next}">Sonraki <i class="fa fa-chevron-right"></i></a></li>
        </ul>
        <div class="clear-fix"></div>
    </div>
</div>

{include file='../layout/footer.tpl'}