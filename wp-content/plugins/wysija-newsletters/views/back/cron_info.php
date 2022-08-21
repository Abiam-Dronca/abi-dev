<?php
defined('WYSIJA') or die('Restricted access');

class WYSIJA_view_back_cron_info extends WYSIJA_view_back{
  function __construct(){
    $this->skip_header = true;

  }

  function defaultDisplay(){
    $this->displayInfo();
  }

  function displayInfo() {
    ?>

    <div class="wrap mpoet-wrap full-width-layout">

      <div class="feature-section one-col" style="margin-left: 0;">
        <div class="col">
          <h2 style="text-align: left;">Guide to configure a Cron job on your server</h2>
          <h3>When do I need to configure a Cron job on my server?</h3>
          <ul>
            <li>The emails on your site <strong>are not</strong> being sent <strong>automatically</strong>.</li>
            <li>The emails on your site <strong>are not</strong> being sent <strong>on time</strong>.</li>
            <li>You want to send at a <strong>regular frequency</strong>.</li>
          </ul>
          <p> Some hosts <strong>remove</strong>, <strong>rename</strong> or <strong>change</strong> the access rights of the file wp-cron.php located at the root of your site (for bandwidth and performance reasons). If that's your case, activating MailPoet's Cron option won't help you.&nbsp;Get in touch with your host or try to re-upload a wp-cron.php file manually. </p>
          <h3>1. Activate MailPoet's Cron</h3>
          <p> The&nbsp;path to enable MailPoet Cron is at&nbsp; <strong>Settings</strong> page &gt;&nbsp;<strong>Advanced</strong> tab &gt; <strong>Geeky Options</strong> link. </p>
          <p> <img src="<?php echo WYSIJA_URL ?>img/cron_info/free_users_settings.png" width="685" width="294"> </p>
          <p> Once you've activated MailPoet's Cron, there are three&nbsp;possible options: </p>
          <ol>
            <li>Manually setup a&nbsp;Cron job on your host's administration panel (cPanel or Plesk) that will access your MailPoet's Cron URL. See below how-to.</li>
            <li>Do nothing and your visitors will automatically trigger your WP-Cron. This option is unreliable for <strong>low traffic</strong> websites.</li>
            <li>You can use one of these services: <a href="https://www.easycron.com/">EasyCron</a> or <a href="https://www.setcronjob.com/">SetCronJob</a>.</li>
          </ol>
          <p> Once MailPoet's Cron is activated, it will enhance the default WP-Cron by preventing duplicated newsletters&nbsp;from being sent to the same subscriber, in the event that your website gets a lot of traffic. </p>

          <h3 id="setting-up-cron-job-on-your-hosts-admin-panel">2. Setting up a&nbsp;Cron job on Your Host's Administration Panel</h3>
          <p> This is where the fun begins!&nbsp;Each host may use a different configuration panel. </p>
          <p> You should look for " <em>cron job</em>" or "<em>task scheduler</em>" option to configure in your host's administration panel.&nbsp;Read the most common ways to add a cron for <a href="http://docs.cpanel.net/twiki/bin/view/AllDocumentation/CpanelDocs/CronJobs#Adding%20a%20cron%20job" target="_blank">cPanel</a>, <a title="Add a cron job with plesk" href="http://download1.parallels.com/Plesk/PP10/10.3.1/Doc/en-US/online/plesk-administrator-guide/plesk-control-panel-user-guide/index.htm?fileName=65208.htm" target="_blank">Plesk&nbsp;</a>or the <a title="Add a cron job the unix way" href="http://www.thegeekstuff.com/2011/07/php-cron-job/" target="_blank">crontab</a>. </p>
          <p> The instructions below are from host's administration panel that uses cPanel. </p>
          <h4>2.1 Access your account's cPanel</h4>
          <p> Usually the link is http://yourwebsite.com/cpanel or http://yourwebsite.com:2082. Once your enter your user id and password and enter the control panel, scroll down to the "Advanced section". </p>
          <h5 class="nolinks">2.2 Go to Cron Settings Page</h5>
          <p> Click on the "Cron Jobs" icon in the advanced section. </p>
          <p> <img src="<?php echo WYSIJA_URL ?>img/cron_info/control_panel.jpeg" width="600" height="447"> </p>
          <h4 class="nolinks">2.3 Set up a Cron Job</h4>
          <p>  <img src="<?php echo WYSIJA_URL ?>img/cron_info/cp_cron_settings.jpeg" width="600" height="380"> </p>
          <p> In the command field, you'll have to type&nbsp;a command that will run a program&nbsp;to call the MailPoet's Cron URL, which you can find in the <strong>MailPoet's Cron</strong> option in the Settings page: </p>
          <p> <img src="<?php echo WYSIJA_URL ?>img/cron_info/cron_url.png" width="1000" height="101"> </p>
          <p> Finally, click on the "Add New Cron Job" button. </p>
          <p> From now on the server will make a request for the wp-cron.php file every 5 minutes. </p>
          <h5 id="cron_commands">2.4 Cron job commands to call MailPoet's Cron&nbsp;URL</h5>
          <p> Below are a few examples of commands you can use. </p> You'll only need to set up
          <strong>one</strong> on your server, so simply pick the one which works on your server (
          <strong>curl</strong> is safer):
          <pre>curl --silent "http://www.yourwebsite.com/wp-cron.php?xxxx..." &gt; /dev/null 2&gt;&amp;1</pre>
          <pre>wget --quiet "http://www.yourwebsite.com/wp-cron.php?xxxx..."</pre>
          <p> Don't forget to replace <strong>http://www.yourwebsite.com/wp-cron.php?xxxx...</strong> with your own MailPoet's Cron&nbsp;URL. </p>
          <p> Some hosts may allow you to set up cron commands from their admin interfaces. But, the commands <strong>wget</strong>, <strong>curl</strong> and <strong>lynx</strong> may not be available, so if the cron doesn't seem to be running, get in touch with your host and they should be able to help you out. </p>

          <h3>How do I know the Cron job is running properly?</h3>
          <p> Simply check that the scheduled emails have been sent on time. </p>
          <p> Make sure that the sending frequency you've setup on your MailPoet installation's <strong>Settings</strong> page &gt; <strong>Send With...</strong>&nbsp;tab is matching the Cron job frequency you've configured on your host administration panel.</p>
          <p> For example, if you want to send 50 emails every minute,&nbsp;then you'll need to have a Cron job running every minute, like this: </p>
          <p> <img src="<?php echo WYSIJA_URL ?>img/cron_info/cron_check.png" width="1000" height="515"> </p>
          <p> Remember! As soon as you select the option&nbsp;" <em>I'll setup a cron job on my server to execute at the frequency I want...</em>" your newsletters will <strong>only</strong> be sent&nbsp;if that URL <strong>is visited</strong>. So, make sure that MailPoet's servers are <strong>able to reach</strong> that URL (no Firewalls are blocking it) or you have a&nbsp;Cron job on your host's administration panel set up to <strong>visit</strong> that URL. </p>
        </div>
      </div>

    </div>
    <?php
  }
}
