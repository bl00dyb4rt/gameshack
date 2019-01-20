<template>
    
    <div class="noti-wrap">
        <div class="noti__item js-item-menu">
            <i class="zmdi zmdi-notifications"></i>
            <span class="quantity">{{notifications.length}}</span>
            <div class="notifi-dropdown js-dropdown">
                <div class="notifi__title ">
                    <p>Notificaciones: {{notifications.length}}</p>
                </div>
                <div v-if="notifications.length">
                    <div class="notifi__item" v-for="item in listar" :key="item.id">
                        <div class="bg-c2 img-cir img-40">
                            <i class="zmdi zmdi-undo"></i>
                        </div>
                        <div class="content">
                            <p>{{item.ingresos.msj}}</p>
                            <span class="date">Nro. de ingresos del día: {{item.ingresos.numero}}</span>
                        </div>
                    </div>
                    <div class="notifi__item" v-for="item in listar" :key="item.id">
                        <div class="bg-c1 img-cir img-40">
                            <i class="zmdi zmdi-redo"></i>
                        </div>
                        <div class="content">
                            <p>{{item.ventas.msj}}</p>
                            <span class="date">Nro de ventas del día: {{item.ventas.numero}}</span>
                        </div>
                    </div>
                </div>
                <div v-else> </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props : ['ruta'],     
	props : ['notifications'],
    data (){         
        return {
            arrayNotifications:[]
        } 
    },
    computed:{
        listar: function()  {
            //return this.notifications[0];
             this.arrayNotifications = Object.values(this.notifications[0]);
            if (this.notifications == '') {
                    return this.arrayNotifications = []; 
            } else {
                //Capturo la ultima notificación agregada 
                this.arrayNotifications = Object.values(this.notifications[0]); 
                //Validación por indice fuera de rango
                if (this.arrayNotifications.length > 3) { 
                    //Si el tamaño es > 3 Es cuando las notificaciones son obtenidas desde el mismo servidor, es decir por la consulta con AXIOS 
                    return Object.values(this.arrayNotifications[4]); 
                } else { 
                    //Si el tamaño es < 3 Es cuando las notificaciones son obtenidas desde el canal privado, es decir mediante Laravel Echo y Pusher 
                    return Object.values(this.arrayNotifications[0]);
                } 
            }
        }
    }
}
</script>