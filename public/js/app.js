import './bootstrap';
function showAlert() {
    alert("No puedes eliminar un usuario activo.");
 }
 var res=function(){
    var not=confirm("Seguro deseas eliminar?");
    return not;
}
