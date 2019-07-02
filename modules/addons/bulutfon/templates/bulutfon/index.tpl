{include file='../layout/header.tpl'}
<div id="app">
<div class="card">
    <div class="card-header">
        Arama Kayıtları
    </div>
    <div class="card-body" v-cloak>
        <table class="bf-table" v-bind:class="{ldelim}animation: loading{rdelim}">
        <thead>
            <tr>
                <th>Arayan</th>
                <th>Aranan</th>
                <th>Arama Zamanı</th>
                <th>Cevaplama Zamanı</th>
                <th>Kapatma Zamanı</th>
                <th>Çağrı Durumu</th>
                <th>Arama Kaydı</th>
            </tr>
        </thead>
            <tbody>
                <tr v-for="item in items">
                    <td>
                        <span class="loading-bar"></span>
                        <span class="text">
                              <div class="wrapper">
                                <a :href="getNumberCount(item.caller) > 1 ? '#' : 'clientsprofile.php?userid='+getUserInfo(item.caller, 'id')" class="bf-flex bf-align-center bf-relative" v-if="isExists(item.caller)">
                                    <span class="bf-success bf-mr-2"  style="padding-top: 0;">{{ getNumberCount(item.caller) }}</span>
                                    <div>
                                        <span style="display: block;">{{ getUserInfo(item.caller, 'firstname')}} {{ getUserInfo(item.caller, 'lastname')}}</span>
                                        {{ item.caller }}
                                    </div>
                                </a>
                                <span v-else>
                                    <span class="bf-danger bf-mr-2" style="padding-top: 0;">0</span>
                                    {{ item.caller }}
                                </span>
                                <div class="tooltip" v-if="isExists(item.caller) && getNumberCount(item.caller) > 1">
                                    <table class="bf-tooltop-table">
                                        <tr v-for="user in getUser(item.caller)">
                                            <td><a :href="'clientsprofile.php?userid='+user.id">#{{ user.id }}</a></td>
                                            <td>
                                                <a :href="'clientsprofile.php?userid='+user.id">{{ user.firstname }} {{ user.lastname }}</a>
                                            </td>
                                            
                                        </tr>
                                      
                                    </table>
                                </div>
                            </div>
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
                        <span class="loading-bar"></span>
                        <span class="text" v-html="getDate(item.answer_time)"></span>
                    </td>
                    <td>
                        <span class="loading-bar"></span>
                        <span class="text" v-html="getDate(item.hangup_time)"></span>
                    </td>
                    <td>
                        <span class="loading-bar" ></span>
                        <span class="text" v-bind:class="{ldelim}'bf-danger': item.missing_call, 'bf-success': !item.missing{rdelim}">
                            <span v-if="item.missing_call">Kaçan Çağrı</span>
                            <span v-else>Cevaplandı</span>
                        </span>
                    </td>
                    <td class="text-right">
                        <span class="loading-bar"></span>
                        <div class="audio" :id="'user-'+item.billsec">
                            <audio v-if="item.call_record == 'YES' && !loading && !item.missing_call"  controls="" type="audio/ogg;">
                                <source :src="getStreamUrl(item)" type="audio/wav" class="text">
                            </audio>
                        </div>
                        <span class="text bf-danger" v-if="item.call_record == 'NO' || item.missing_call">Kayıt Yok</span>
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
                    <td colspan="5" class="text-center">Sayfa: <input type="text" v-model="page" style="width: 35px;" v-on:change="getPage(page)">/{{ total }}</td>
                    <td class="text-right">
                        <a href="#" v-on:click="getPage(next)" v-if="total>page">Sonraki</a>
                        <span v-else class="text-muted">Sonraki</span>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
   
</div>

{include file='../layout/footer.tpl'}