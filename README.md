## ------- Comandos para poder conectarse remotamente

## git init

## git remote set-url origin https://github.com/Dantvader/Proyecto_Frameworks.git



## ------ navegar por Git

## git branch (ve ramas guardadas localmente)

## git branch -r (ve las ramas remotas)

## git branch -a (locales + remotas)

## git checkout (nombre-de-la-rama) // te lleva a la rama deseada





## ------ troubleshooting

## git fetch --prune (coordina ramas locales con las remotas)


## ------ guardar y subir cambios

## antes de realizar algun cambio, por favor verifica que estas en la branch correcta

## git add .

## git commit -m (Nombre del Commit)

## git push -u origin (nombre de la rama)


## si por algun casual subiste un commit no deseado  lo puedes quitar 

## git reset --hard (nombre del commit)

## no se si funciona asi la vdd, nunca he tenido que usarlo

## url = https://dantvader.github.io/Proyecto_Frameworks


## si por algun casual crean un nuevo html favor de procurar que este cuente con el siguiente script

##        <script>
##        // Verificar sesión al cargar la página
##        document.addEventListener('DOMContentLoaded', function() {
##            if (window.location.hostname.includes('github.io')) {
##                const usuario = localStorage.getItem('usuario');
##                if (!usuario) {
##                    window.location.href = 'index.html';
##                } else {
##                    // Mostrar información del usuario si quieres
##                    console.log('Usuario logueado:', JSON.parse(usuario));
##                }
##            }
##        });
##        </script>


uses node modules: json,jsonwebtoken,express,nodemon,morgan,mysql,urlencoded