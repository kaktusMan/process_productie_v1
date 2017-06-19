function initWizard()
{   
    this.currentTab = 1;
    var self = this;
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();

    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        var $target = $(e.target);
      /*  if ($target.parent().hasClass('disabled')) {
            return false;
        }*/
    });

    this.nextTab = function(){
        self.currentTab++;
        var $active = $('.wizard .nav-tabs li.active');
        // $active.next().removeClass('disabled');
        nextTab($active);
    }
    this.prevTab = function(){
       self.currentTab--;
        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);  
    } 
    return this;
};

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}  