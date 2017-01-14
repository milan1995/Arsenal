$('#dajJSON').on('submit',function(){
var pod=$(this);
contents=that.serialize();
$ajax({
url: 'dajJSON.php',
dataType: 'json',
type: 'post',
data: contents,
succes: function(data){
console.log('2');
}
});



return false;
});
