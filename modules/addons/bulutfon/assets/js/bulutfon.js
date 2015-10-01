var bulutfon ={
    addLinks:function(){
        $('#clienttabs ul li,ul.client-tabs li').removeClass('active');
        $('#clienttabs ul,ul.client-tabs').append('<li class="tab bulutfon-link active"><a href="clientssummary.php?userid='+this.getUrl('userid')+'&bulutfon=1">Bulutfon</a></li>');
        if(this.getUrl('bulutfon') == 1){
            console.log('bulutfon');
            $('.bulutfon-link').addClass('selected');
            $('.tabselected').removeClass('tabselected').addClass('tab');
            $('#tab_content,.tab-content').html("<div style='min-height:200px;'><img src='../modules/addons/bulutfon/assets/img/loader.gif' class='bulutfon-loader'/></div>");
            this.showBulutfonContent(this.getUrl('userid'),this.getUrl('page'),this.getUrl('limit'));
        }
    },
    getUrl : function(name) {
        return decodeURI(
            (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search) || [, null])[1]
        );
    },
    deleteNumber:function(number,elem){
        elem.closest(".bulutfon-number").addClass("deleted");
        $.getJSON('addonmodules.php?module=bulutfon&tab=delete&number='+number,function(data){
            if(data.html=="deleted"){
                elem.closest(".bulutfon-number").hide();
            }
        }); 
    },
    showBulutfonContent: function(id,page,limit){
        page = page !== 'null' ?  page : 1;
        limit = limit !== 'null' ?  limit : 10;
        $.getJSON('addonmodules.php?module=bulutfon&userid='+id+'&page='+page+'&limit='+limit, function(data){  $('#tab_content,.tab-content').html("<br>"+data.html); });
    }
};
$(function(){
    bulutfon.addLinks();

    $("#kullanici").keyup(function () {
        var intellisearchlength = $("#kullanici").val().length;
        if (intellisearchlength>2) {
            var data = $('#form-kullanici').serializeArray();
            data.push({name: 'token', value: $('input[name=token]').val()});
            $.post("search.php", data,
                function(data){
                    $("#kullanici-searchresults").html(data);
                    $("#kullanici-searchresults").slideDown("slow");
                });
        }
    });
    $("#intellisearchcancel").click(function () {
        $("#kullanici").val("");
        $("#kullanici-searchresults").slideUp("slow");
    });
    $('#tab_content,.tab-content').on('click','.delete-bulutfon-number',function(){
        bulutfon.deleteNumber($(this).data('number'),$(this));
    });
    $('#kullanici-searchresults').on('click','.searchresult a',function(){
        var name = $(this).find("strong").html();
        var id =  $(this).attr('href').replace( /[^\d]/g, '' );
        $('#bulutfon-clientid').val(id);
        $('#kullanici').val(name);

       return false;
    });
    if(bulutfon.getUrl('module')=='bulutfon'){
        $('#sidebar').html('<img src="../modules/addons/bulutfon/assets/img/Bulutfon_Logo.png" class="bulutfon-logo"/>');
    }
});
