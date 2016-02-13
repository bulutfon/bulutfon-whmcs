{include file='../layout/header.tpl'}
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.4.0/jsgrid.min.css">
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.4.0/jsgrid-theme.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.4.0/jsgrid.min.js"></script>
<script>
    $(function(){
        var AudioField = function(config) {
            jsGrid.Field.call(this, config);
        };

        AudioField.prototype = new jsGrid.Field({
            test: "foo",
            itemTemplate: function(value) {
                console.log(this);
                if (value=='Var') {
                    return '<audio controls="'+this.test+'"><source src="https://api.bulutfon.com/call-records/4cf7932a-3688-4cf4-b1d2-3c130142f4a0/stream?access_token={$token}" type="audio/wav"></audio>';
                }
                return "Arama Kaydi Yok";
            }
        });

        jsGrid.fields.audio = AudioField;

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
                { name: "call_record", type: "text", title: "Arama Kaydi",itemTemplate: function(value, item) {
                    if(value=='Var') {
                        return '<audio  controls=""><source src="https://api.bulutfon.com/call-records/'+item.uuid+'/stream?access_token={$token}" type="audio/wav"></audio>';
                    }
                    return "Arama Kaydi Yok";
                }},
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

{include file='../layout/footer.tpl'}