//Define function
function sayHello(){
    console.log('hello');
}

//Define Object
function Hello(greeting, who){
    if(null == greeting) {greeting = 'Hello';}
    if(null == who) {who = 'World';}
        
    return {
        greeting: greeting,
        who: who,
        
        say: function(){
            alert(this.greeting+' '+this.who);
        },   
        sayHello: sayHello
    };
}

//Do something
//...
