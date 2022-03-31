$(document).ready(function(){
    $('li.six a:first').addClass('active');
    $('.formularios form').hide();
    
    $('li.six a').click(function(){
        $('li.six a').removeClass('active');
        $(this).addClass('active');
        $('.formularios form').hide();
    
        var activeTab = $(this).attr('href');
        $(activeTab).show();
        return false;
    });  
    });
    $(document).ready(function(){
        $('li.seven a:first').addClass('active');
        $('.formularios form').hide();
        
        $('li.seven a').click(function(){
            $('li.seven a').removeClass('active');
            $(this).addClass('active');
            $('.formularios form').hide();
        
            var activeTab = $(this).attr('href');
            $(activeTab).show();
            return false;
        });  
        });
        $(document).ready(function(){
            $('li.eight a:first').addClass('active');
            $('.formularios form').hide();
            
            $('li.eight a').click(function(){
                $('li.eight a').removeClass('active');
                $(this).addClass('active');
                $('.formularios form').hide();
            
                var activeTab = $(this).attr('href');
                $(activeTab).show();
                return false;
            });  
            });