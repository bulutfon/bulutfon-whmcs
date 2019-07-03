<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="'/modules/addons/bulutfon/assets/css/bulutfon.css">
    <style>
        body {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div id="app">
   
        <table class="table" v-bind:class="{ldelim}animation: loading{rdelim}">
        <thead>
            <tr>
                <th>Arayan</th>
                <th>Aranan</th>
                <th>Arama Zamanı</th>
                <th>Çağrı Durumu</th>
                <th>Arama Kaydı</th>
            </tr>
        </thead>
            <tbody>
                <tr v-for="item in items" v-if="items.length>0">
                    <td>
                        <span class="loading-bar"></span>
                        <span class="text">
                              {{ item.caller }}
                        </span>
                    </td>
                    <td>
                        <span class="loading-bar"></span>
                        <span class="text">{{ item.callee }}</span>
                    </td>
                    <td>
                        <span class="loading-bar"></span>
                        <span class="text" v-html="getDate(item.call_time)"></span>
                    </td>
                    <td>
                        <span class="loading-bar" ></span>
                        <span class="text" v-bind:class="{ldelim}'badge badge-danger': item.missing_call, 'bf-success': !item.missing{rdelim}">
                            <span v-if="item.missing_call">Cevapsız Çağrı</span>
                            <span v-else class="badge badge-success">Cevaplandı</span>
                        </span>
                    </td>
                    <td class="text-right">
                        <span class="loading-bar"></span>
                        <div class="audio" :id="'user-'+item.billsec">
                            <audio v-if="item.call_record == 'YES' && !loading && !item.missing_call"  controls="" type="audio/ogg;">
                                <source :src="getStreamUrl(item)" type="audio/wav" class="text">
                            </audio>
                        </div>
                        <span class="text badge badge-danger" v-if="item.call_record == 'NO' || item.missing_call">Kayıt Yok</span>
                    </td>
                </tr>
                <tr v-if="items.length === 0">
                    <td colspan="7">Kayıt bulunamadı</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>
                       
                        <a href="#" v-on:click="getPage(previous)" v-if="page>1">Önceki</a>
                        <span v-else class="text-muted">Önceki</span>
                    </td>
                    <td colspan="3" class="text-center">Sayfa: <input type="text" v-model="page" style="width: 35px;" v-on:change="getPage(page)">/{{ total }}</td>
                    <td class="text-right">
                        <a href="#" v-on:click="getPage(next)" v-if="total>page">Sonraki</a>
                        <span v-else class="text-muted">Sonraki</span>
                    </td>
                </tr>
            </tfoot>
        </table>

</div>
<script>
window.token = '{$token}'
window.phonenumber = '{$phonenumber}'
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
<script src="/modules/addons/bulutfon/assets/js/axios.min.js"></script>
<script src="/modules/addons/bulutfon/assets/js/mixins/paginator.js"></script>
<script src="/modules/addons/bulutfon/assets/js/vue.js"></script>
<script src='/modules/addons/bulutfon/assets/js/bulutfon.js'></script>
</body>
</html>



