$(document).ready(function(){
    $('ul.ul-fourt2 li a:first').addClass('active');
    $('.formularios form').hide();
    
    $('ul.ul-fourt2 li a').click(function(){
        $('ul.ul-fourt2 li a').removeClass('active');
        $(this).addClass('active');
        $('.formularios form').hide();
    
        var activeTab = $(this).attr('href');
        $(activeTab).show();
        return false;
    });  
    });
    $(document).ready(function(){
        $('ul.ul-fourt3 li a:first').addClass('active');
        $('.formularios form').hide();
        
        $('ul.ul-fourt3 li a').click(function(){
            $('ul.ul-fourt3 li a').removeClass('active');
            $(this).addClass('active');
            $('.formularios form').hide();
        
            var activeTab = $(this).attr('href');
            $(activeTab).show();
            return false;
        });  
        });
        $(document).ready(function(){
            $('ul.ul-fourt4 li a:first').addClass('active');
            $('.formularios form').hide();
            
            $('ul.ul-fourt4 li a').click(function(){
                $('ul.ul-fourt4 li a').removeClass('active');
                $(this).addClass('active');
                $('.formularios form').hide();
            
                var activeTab = $(this).attr('href');
                $(activeTab).show();
                return false;
            });  
            });

    $(document).ready(function(){
        $('ul.ul-third2 li a:first').addClass('active');
        $('.formularios form').hide();
        
        $('ul.ul-third2 li a').click(function(){
            $('ul.ul-third2 li a').removeClass('active');
            $(this).addClass('active');
            $('.formularios form').hide();
        
            var activeTab = $(this).attr('href');
            $(activeTab).show();
            return false;
        });  
        });
        $(document).ready(function(){
            $('ul.ul-third li.docente a.docente').addClass('active');
            $('.formularios form').hide();
            
            $('ul.ul-third li.docente a.docente').click(function(){
                $('ul.ul-third li.docente a.docente').removeClass('active');
                $(this).addClass('active');
                $('.formularios form').hide();
            
                var activeTab = $(this).attr('href');
                $(activeTab).show();
                return false;
            });  
            });
           
            $(document).ready(function(){
                $('ul.ul_five li a:first').addClass('active');
                $('.formularios form').hide();
                
                $('ul.ul_five li a').click(function(){
                    $('ul.ul_five li a').removeClass('active');
                    $(this).addClass('active');
                    $('.formularios form').hide();
                
                    var activeTab = $(this).attr('href');
                    $(activeTab).show();
                    return false;
                });  
                });

                