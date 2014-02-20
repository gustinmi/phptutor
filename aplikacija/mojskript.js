function setupLogin(){

    var states = {
        'onEnter' : function(jqEl){
            console.log( "focus for" + jqEl.attr('id') );
            //jqEl.toggleClass('focused');
            jqEl.val('');
        },
        'onLeave' : function(jqEl){
            console.log( "focus ouit for" + jqEl.attr('id') );
            if (jqEl.val()===''){
              //  jqEl.toggleClass('empty');
            } else{
               // jqEl.toggleClass('ok');
            }
        }
    },
    data = {
        'txtName' : {
            'prompt' : 'Username',
            'entered' : '',
            'get' : function(){
                return data['name']['entered'] !== '' ? data['txtName']['entered']  : data['txtName']['prompt'];
            },
            'set' : function(val){
                val !== '' ? data['txtName']['entered'] = val : data['txtName']['entered'] = '';
            }
        },
        'txtPassword' : {
            'prompt' : 'Password',
            'entered' : '',
            'get' : function(){
                return data['txtPassword']['entered'] !== '' ? data['txtPassword']['entered'] : data['txtPassword']['prompt'];
            },
            'set' : function(val){
                val !== '' ? data['txtPassword']['entered'] = val : data['txtPassword']['entered'] = '';
            }
        }
    };

	$('input#txtName').on( "focusout", function(){
		states['onLeave']($(this));
	});	
	$('input#txtName').on( "focus", function(){
        states['onEnter']($(this));
	});
    $('input#txtPassword').on( "focusout", function(){
        states['onLeave']($(this));
    });
    $('input#txtPassword').on( "focus", function(){
        states['onEnter']($(this));
    });


}