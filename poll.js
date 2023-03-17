
const {db_con}=require("./db");
const apikey="d45cb6fa795e6db55072f712251221bd";
 
 
 function pollFromApi(){
    console.log('Polling...');
    ["dhaka","mymensingh","Rajshahi","sylhet","Rangpur","barisal","chittagong","lahore","delhi","nepal","Beijing","tokyo"].forEach(place => {
        searchByCity(place)
        
    });
 ;

}
function searchByCity(place){
    //var place= document.getElementById('input').value;
    var urlsearch= `http://api.openweathermap.org/data/2.5/weather?q=${place}&` + `appid=${apikey}`;

    fetch(urlsearch).then((res)=>{
        return res.json();
    }).then((data)=>{
        
       // weatherReport(data);
     if(data.dt){
        InsertData(data,place);
     }
     else{
        console.log("data not found for : ",place);
     }

    })
   // document.getElementById('input').value='';
}





function InsertData(data,division) {
    let SQLQuery="INSERT INTO `temp`(`tempareture`, `timestamp`, `division`) VALUES (?,?,?)"
    
    const date=new Date(data.dt*1000).toISOString().substring(0,19).replace("T"," ");
    //const tmp=data.main.temp * 9 / 5 + 32;
    //console.log(data.main.temp)
    const tmp=data.main.temp-273.15 ;
    console.log(parseFloat(tmp).toFixed(2));
    db_con.query(SQLQuery, [tmp, date,division], function (error) {
        if(error){
            console.log("Data insert fail");
        }
        else{
            console.log("Data insert success");
        }
    })
}

exports.pollFromApi=pollFromApi