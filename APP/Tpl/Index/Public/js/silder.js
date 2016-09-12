<script type="text/javascript">
  var urlstr = location.href;
  //alert((urlstr + '/').indexOf($(this).attr('href')));
  var urlstatus=false;
  $("#topnav a").each(function () {
    if ((urlstr + '/').indexOf($(this).attr('href')) > -1&&$(this).attr('href')!='') {
      $(this).addClass('topnav_current'); urlstatus = true;
    } else {
      $(this).removeClass('topnav_current');
    }
  });
  if (!urlstatus) {$("#topnav a").eq(0).addClass('topnav_current'); }
</script>