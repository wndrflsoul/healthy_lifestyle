var z = document.getElementsByName('repassword');

        

            z[0].oninput = function () {

                var pass = document.getElementById('password').value;

                var err = document.getElementById('error');

                if(z[0].value != pass){

                    err.innerText = 'Пароли не совпадают';

                    document.getElementById("buttonsuccess").disabled = true;

                } else {

                    err.innerText = 'Пароли совпадают, можно регистрироваться';

                    document.getElementById("buttonsuccess").disabled = false;

                }

            }