var tabs = $('ul.client-tabs').not('.dont-inject')
tabs.append('<li class="tab bulutfon-tab"><a href="#">Bulutfon</a></li>')


$('ul.client-tabs').on('click', '.bulutfon-tab', function(e) {
    e.preventDefault();
    $('ul.client-tabs li').removeClass('active');
    $(this).addClass('active');
    var urlParams = new URLSearchParams(window.location.search);
   
    $('.tab-pane.active').html('<iframe id="bf-iframe" src="addonmodules.php?module=bulutfon&action=home&work=user&userid='+urlParams.get('userid')+'" style="width:100%;height: 1000px;border:none;"></iframe>')

   
  
});
$(function () {
    
    
})

$('#contentarea h1, #content h1').hide();

Number.prototype.pad = function (len) {
    return (new Array(len+1).join("0") + this).slice(-len);
}

function isValidDate(d) {
    return d instanceof Date && !isNaN(d);
}

if ($('#app').length > 0) { 
    var app = new Vue({
        el: '#app',
        mixins: [paginator],
        data: {
            items: [],
            itemKey: 'caller',
            paginatorName: 'pagination',
            page: 1,
            loading: false,
            total: 0,
            perpage: 10,
            token: window.token,
            phonenumber: window.phonenumber,
            apiUrl: 'https://api.bulutfon.com/',
            searchResults: [],
            endpoint: 'cdrs'
        }
    });
}

if ($('#sms').length > 0) { 
    var sms = new Vue({
        el: '#sms',
        mixins: [paginator],
        data: {
            items: [],
            itemKey: 'recipients',
            paginatorName: 'paginate',
            page: 1,
            loading: false,
            total: 0,
            perpage: 10,
            token: window.token,
            apiUrl: 'https://api.bulutfon.com/',
            searchResults: [],
            endpoint: 'messages',
            shown: false,
            phonenumber: window.phonenumber,
            messageContent: ''
        },
        methods: {
            showMessage: function (uuid) {
                
                var that = this;
        
                
                axios.get(this.getUrl({url: true}, 'messages/'+uuid))
                .then(function (response) {
                    that.messageContent = response.data.message.content;
                    that.shown = !that.shown;
                   
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(function () {
                    // always executed
                });
            }
        }
    });
}