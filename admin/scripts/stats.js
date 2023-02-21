const canva = document.querySelector("#barcanva");

const chartHomme = canva.dataset.homme
const chartFemme= canva.dataset.femme
const chartAutre = canva.dataset.autre


const barChart = new Chart(canva,{
    type:"doughnut", //bar
    data:{
        labels:["Homme","Femme","Autre"],
        datasets:[{
            data:[chartHomme,chartFemme,chartAutre],
            backgroundColor:[
                "blue",
                "red",
                "violet",
            ]
        }]
    }
})

// const chart = new Chart(canva, {
//     type: 'line',
//     data: [1,2,3,4,5,6],
//     options: {
//       onClick: (e) => {
//         const canvasPosition = getRelativePosition(e, chart);
  
//         // Substitute the appropriate scale IDs
//         const dataX = chart.scales.x.getValueForPixel(canvasPosition.x);
//         const dataY = chart.scales.y.getValueForPixel(canvasPosition.y);
//       }
//     }
// });