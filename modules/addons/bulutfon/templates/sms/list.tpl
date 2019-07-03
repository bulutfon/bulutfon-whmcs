{include file='../layout/header.tpl'}

<div id="sms">
<div class="bf-modal"  v-bind:class="{ldelim}shown: shown{rdelim}">
  <label class="bf-modal__bg" for="bf-modal-1"></label>
  <div class="bf-modal__inner">
    <label class="bf-modal__close" for="bf-modal-1" v-on:click="shown = false"></label>
    {{ messageContent }}
  </div>
</div>
    <div class="card">
        <div class="card-header">
            Sms Kayıtları
        </div>
        <div class="card-body" v-cloak>
            <table class="bf-table" v-bind:class="{ldelim}animation: loading{rdelim}">
                <thead>
                    <tr>
                     <th>Alıcı</th>
                        <th>Başlık</th>
                       
                        <th>Gönderim Zamanı</th>
                        <th class="text-right">İçerik</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="message in items">
                        <td width="250">
                            <span class="loading-bar"></span>
                            <span class="text">
                                <div class="wrapper">
                                    <div class="bf-flex bf-align-center bf-relative"  v-if="isExists(message.recipients)">
                                        <span class="bf-success bf-mr-2"  style="padding-top: 0;">{{ getNumberCount(message.recipients) }}</span>
                                        <div>
                                            <a style="display: block;" :href="getNumberCount(message.recipients) > 1 ? '#' : 'clientsprofile.php?userid='+getUserInfo(message.recipients, 'id')">
                                                {{ getUserInfo(message.recipients, 'firstname')}} {{ getUserInfo(message.recipients, 'lastname')}}
                                            </a>
                                            <a :href="'tel:+'+message.recipients">{{ message.recipients }}</a> 
                                        </div>
                                    </div>
                               
                                <span v-else>
                                    <span class="bf-danger bf-mr-2" style="padding-top: 0;">0</span>
                                    <a :href="'tel:+'+message.recipients">{{ message.recipients }}</a>
                                </span>
                                <div class="tooltip" v-if="isExists(message.recipients) && getNumberCount(message.recipients) > 1">
                                    <table class="bf-tooltop-table">
                                        <tr v-for="user in getUser(message.recipients)">
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
                            <span class="text">{{ message.title }}</span>
                        </td>
                        <td>
                            <span class="loading-bar"></span>
                            <span class="text" v-html="getDate(message.created_at)"></span>
                        </td>
                        <td class="text-right">
                            <button v-on:click="showMessage(message.id)">Göster</button>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td>
                       
                        <a href="#" v-on:click="getPage(previous)" v-if="page>1">Önceki</a>
                        <span v-else class="text-muted">Önceki</span>
                    </td>
                    <td colspan="2" class="text-center">Sayfa: <input type="text" v-model="page" style="width: 35px;" v-on:change="getPage(page)">/{{ total }}</td>
                    <td class="text-right">
                        <a href="#" v-on:click="getPage(next)" v-if="total>page">Sonraki</a>
                        <span v-else class="text-muted">Sonraki</span>
                    </td>
                </tr>
            </tfoot>
            </table>
        </div>
    </div>
</div>

{include file='../layout/footer.tpl'}