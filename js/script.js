let addtask = (login,password)=>{
    let task = document.getElementById('todo').value;
    let bod = "task="+task+"&login="+login+"&password="+password;
    
    if(task != ''){
        let todolist = document.getElementById('todolist');
        let promise = fetch("./utils/addtodo.php",{
            method: "POST",
            body: bod,
            headers: 
            {
                "Content-Type": "application/x-www-form-urlencoded"
            }
        }).then(rs => rs.json());
        promise.then(val => {
            let newlistitem = document.createElement('li');
            let newinputitem = document.createElement('input');
            let newtextitem = document.createElement('p');
            newlistitem.setAttribute("id",val);
            newinputitem.setAttribute('type','checkbox');
            newinputitem.setAttribute('onclick',"changestats("+val+",'"+login+"','"+password+"')");
            newtextitem.innerHTML = task;
            newlistitem.appendChild(newinputitem);
            newlistitem.appendChild(newtextitem);
            todolist.appendChild(newlistitem);
        });
    }

}
let changestats = (id,login,password)=>{
    //fetch -> change in database
    let bod = "id="+id+"&login="+login+"&password="+password;
    let promise = fetch("./utils/updatetodo.php",{
        method: "POST",
        body: bod,
        headers: 
        {
            "Content-Type": "application/x-www-form-urlencoded"
        }
    }).then(rs => rs.json());
    promise.then(val => {
        let li = document.getElementById(id);
        let clone = li.cloneNode(true);
        if(li.parentElement.getAttribute('id') == "todolist"){
            let donelist = document.getElementById('donelist');
            donelist.appendChild(clone);
            li.parentNode.removeChild(li);
        }else{
            let todolis = document.getElementById('todolist');
            todolis.appendChild(clone);
            li.parentNode.removeChild(li);
        }

    });
}
(()=>{
    
})()