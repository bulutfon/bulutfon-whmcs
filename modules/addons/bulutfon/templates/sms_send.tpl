{include file='header.tpl'}
<div class="bulutfon_wrapper">
    <div class="bulutfon_header">
        Gonderilen SMS'ler
    </div>
    <div class="bulutfon_content">
        <table class='table table-bordered'>
        <thead>
        <tr>
          <th>#</th>
          <th>Kullanici ID</th>
          <th>Mesaj</th>
        </tr>
      </thead>
        {foreach from=$all_sms item=sms}
        <tr>
            <td>{$sms->id}</td>
            <td><a href="clientssummary.php?userid={$sms->userid}" target="_blank">{$sms->userid}</a></td>
            <td>{$sms->message}</td>
        </tr>
        {/foreach}
        </table>
      
    <nav>
  <ul class="pagination">
    {for $foo=1 to $num_pages}
        {if $page == $foo }
        <li class="active"><a href="addonmodules.php?module=bulutfon&tab=sms-send&page={$foo}">{$foo}</a></li>
        {else}
        <li><a href="addonmodules.php?module=bulutfon&tab=sms-send&page={$foo}">{$foo}</a></li>
        {/if}
         
    {/for}
  
  </ul>
</nav>
    </div>
</div>

{include file='footer.tpl'}
