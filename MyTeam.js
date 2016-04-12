var createRow = function() {
    //alert("hello world")
    var table = document.getElementById("teamTable")
    var trow = document.createElement('tr')
    var bYear = document.getElementById("birthYear").value
    var bMonth = document.getElementById("birthMonth").value
    var bDay = document.getElementById("birthDay").value
    var Birthday = bYear+"-"+bMonth+"-"+bDay
    console.log(bYear)
    console.log(bMonth)
    console.log(bDay)
    trow = table.insertRow()
    for(var i = 0; i < 5; i++){
            var tcol = document.createElement('td')

            var columnName = i==0? "fname" : 
                             i==1? "lname" : 
                             i==3? "heightInput" : 
                             i==4? "weightInput" : 
            console.log(document.getElementById(columnName).value)
            tcol.appendChild(
                            document.createTextNode(i!=2?
                                document.getElementById(columnName).value:Birthday
                                                    )
                            )
            trow.appendChild(tcol)
    }
    
}