{include file='../layout/header.tpl'}
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.4.0/jsgrid.min.css">
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.4.0/jsgrid-theme.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.4.0/jsgrid.min.js"></script>
<script>
    $(function(){
        var format_date = function(value) {
            if(value) {
                var d = new Date(value);
                return ("0" + (d.getUTCDate())).slice(-2)+'-'+ ("0" + (d.getMonth() + 1)).slice(-2)+'-'+ d.getFullYear()+' '+("0" + (d.getHours())).slice(-2)+':'+("0" + (d.getMinutes())).slice(-2)+':'+ ("0" + (d.getSeconds())).slice(-2);
            }
            return ' ';
        };
        var audio_url = function(value,item) {
            if(value=='Var') {
                return '<audio  controls="" type="audio/ogg;"><source src="https://api.bulutfon.com/call-records/'+item.uuid+'/stream?access_token={$token}" type="audio/wav"></audio>';
            }
            return "Arama Kaydi Yok";
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
            data: {{$cdrs}},
            fields: [
                { name: "caller", type: "text", width: 25,title: "Arayan" },
                { name: "callee", type: "text", width: 25 ,title: "Aranan"},
                { name: "call_record", type: "text", title: "Arama Kaydi",itemTemplate: function(value, item) { return audio_url(value,item); }},
                { name: "call_time", type: "text", width: 50 ,title: "Arama Zamani",itemTemplate: function(value){ return format_date(value); }},
                { name: "hangup_time", type: "text", width: 50 ,title: "Kapatma Zamani",itemTemplate: function(value){ return format_date(value); }},
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

{include file='../layout/footer.tpl'}