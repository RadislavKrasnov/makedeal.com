/**
 * Created by radik on 8/26/17.
 */

$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'/regions',
                data: 'country_id='+countryID,
                success: function(html){
                    $('#region').html(html);
                    $('#city').html('<option value="">Select region first</option>');
                }
            });
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select region first</option>');
        }
    });

    $('#region').on('change',function(){
        var regionID = $(this).val();
        if(regionID){
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'cities',
                data:'region_id='+regionID,
                success:function(html){
                    $('#city').html(html);
                }
            });
        }else{
            $('#city').html('<option value="">Select region first</option>');
        }
    });
});
