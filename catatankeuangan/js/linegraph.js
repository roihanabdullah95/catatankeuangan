$(document).ready(function(){
	$.ajax({
	  url : "http://localhost/catatankeuangan/followersdata.php",
	  type : "GET",
	  success : function(data){
		console.log(data);
  
		var id = [];
		var pemasukan = [];
		var pengeluaran = [];
		// var googleplus_follower = [];
  
		for(var i in data) {
		  id.push("id " + data[i].id);
		  pemasukan.push(data[i].pemasukan);
		  pengeluaran.push(data[i].pengeluaran);
		//   googleplus_follower.push(data[i].googleplus);
		}
  
		var chartdata = {
		  labels: id,
		  datasets: [
			{
			  label: "pemasukan",
			  fill: false,
			  lineTension: 0.1,
			  backgroundColor: "rgba(59, 89, 152, 0.75)",
			  borderColor: "rgba(59, 89, 152, 1)",
			  pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
			  pointHoverBorderColor: "rgba(59, 89, 152, 1)",
			  data: pemasukan
			},
			{
			  label: "pengeluaran",
			  fill: false,
			  lineTension: 0.1,
			  backgroundColor: "rgba(29, 202, 255, 0.75)",
			  borderColor: "rgba(29, 202, 255, 1)",
			  pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
			  pointHoverBorderColor: "rgba(29, 202, 255, 1)",
			  data: pengeluaran
			}
		  ]
		};
  
		var ctx = $("#mycanvas");
  
		var LineGraph = new Chart(ctx, {
		  type: 'line',
		  data: chartdata
		});
	  },
	  error : function(data) {
  
	  }
	});
  });