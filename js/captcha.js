//Developer: Jonathan Musa Skosana

$(function () {
   
    registerCaptcha();
    loginCaptcha();
  
});

function registerCaptcha()
{
    $('#btn-register').hide();

    const captcha = new Captcha($('#canvas'),{
        length: 6,
        autoRefresh:false,
        caseSensitive:true,
        width: 100,
        height: 40,
        font: 'bold 23px Arial',
        resourceType: 'aA0', // a-lowercase letters, A-uppercase letter, 0-numbers
        resourceExtra: [],
        clickRefresh: true,

    });

    $('#valid').on('click', function() {
        const ans = captcha.valid($('input[name="code"]').val());
        console.log(ans);

            if(ans == true)
            {
                $('#btn-register').show();
            }
            else
            {
                $('#btn-register').hide();
            }

            // refresh
            captcha.refresh();

            // get the code
            captcha.getCode();

            // test if the code is correct
            captcha.valid("");

            $('#code').val('');
      });

}

function loginCaptcha()
{
    $('#btn-login').hide();

    const captcha = new Captcha($('#login-canvas'),{
        length: 6,
        autoRefresh:false,
        caseSensitive:true,
        width: 100,
        height: 40,
        font: 'bold 23px Arial',
        resourceType: 'aA0', // a-lowercase letters, A-uppercase letter, 0-numbers
        resourceExtra: [],
        clickRefresh: true,

    });

      $('#login-valid').on('click', function() {
        const ans = captcha.valid($('input[name="login-code"]').val());
        console.log(ans);

            if(ans == true)
            {
                $('#btn-login').show();
            }
            else
            {
                $('#btn-login').hide();
            }

            // refresh
            captcha.refresh();

            // get the code
            captcha.getCode();

            // test if the code is correct
            captcha.valid("");

            $('#login-code').val('');
      });

}