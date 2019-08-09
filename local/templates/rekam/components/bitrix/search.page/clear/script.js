var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};
$(document).ready(function () {
  console.log("Ready!!!");
  var $sectionFilter = getUrlParameter('sectionFilter');
  console.log($sectionFilter);
  if ($sectionFilter == undefined || $sectionFilter == '') $("#sectionFilter").val('abcdefghijklmnopqrstuvwxyz');
  else $("#sectionFilter").val(getUrlParameter('sectionFilter'));
});