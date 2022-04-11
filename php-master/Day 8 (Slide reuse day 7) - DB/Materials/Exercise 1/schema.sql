{
	template: `<div class="hd__screen font_size_14 p-4 search-result-wrapper min-h-full">
	  <div class="" style="background-color: #F8E8E8;margin-bottom: 5px;">
		<button class="font-semibold px-3 py-2 ml-2" >
		<a href="/#/group/bac_giang/tcvh_capxa_thon">Cấp Xã</a>
		</button>
		<button class="font-semibold px-3 py-2" style="background-color: #FBFAFA;color:#B11312;">
		<a href="/#/group/bac_giang/tcvh_caphuyen_xa">Cấp Huyện</a>
		</button>
		<button class="font-semibold px-3 py-2">
		<a href="/#/group/bac_giang/tcvh_captinh_huyen">Cấp Tỉnh</a>
		</button>
	  </div>
	<v-layout row wrap class="-mx-2" v-if="renderDetail">
	  <div class="flex  top-0 mb-2" style="margin-bottom: 5px;">
		<button class="top-title px-3 py-2 border border-green-500" style="border-color: #65B400; color: #ffffff;background-color: #65B400;z-index: 2; font-weight: 700;">
		  <a href="/#/group/bac_giang/tcvh_caphuyen_xa">THÔNG TIN CẤP XÃ</a>
		</button>
		<button class="top-title px-3 py-2 border border-green-500 not-select" style="border-color: #65B400; color: #000000; background-color: #DDEEC8;z-index: 1;font-weight: 500;">
		  <a href="/#/group/bac_giang/tcvh_caphuyen_huyen">Thông tin cấp Huyện</a>
		</button>
	  </div>
	  <v-flex xs12 class="guest__table px-2">
		<div class="flex items-center mb-2">
		  <qlvt-filter placeholderKeywords="Tìm kiếm" class="w-2/3" ref="filter" :filter_options="[]">
		  <template v-slot:filter_button="{ submitSearch, showSearchAdvanced }">
			<vuejx-autocomplete class="w-full" :config="{
				model: 'QuanHuyen._source.MaMuc',
				label: '',
				placeholder: 'Chọn huyện',
				object: false, itemText: '_source.TenMuc',
				itemValue: '_source.MaMuc',
				link: [ { db: 'CSDL_BacGiang', collection: 'C_QuanHuyen', cache: true, size: 100
				}],
				column: ['type', 'MaMuc', 'TenMuc'],
				}" :data="filter" v-model="filter['QuanHuyen._source.MaMuc']" :site="$parent.site" @change="changeQuanHuyen();submitSearch($event, 'cbx')">
			</vuejx-autocomplete>
			<vuejx-autocomplete class="w-full"  :config="{
				model: 'PhuongXa._source.MaMuc',
				label: '', object: false, itemText: '_source.TenMuc',
				placeholder: 'Chọn xã',
				itemValue: '_source.MaMuc',
				link: [ { db: 'CSDL_BacGiang', collection: 'C_PhuongXa', cache: true, size: 100,
				condition: [{
					'match': { 'QuanHuyen._source.MaMuc': filter['QuanHuyen._source.MaMuc']
					}
				}]
				}],
				column: ['type', 'MaMuc', 'TenMuc'],
				}" :data="filter" v-model="filter['PhuongXa._source.MaMuc']" :site="$parent.site" @change="changePhuongXa();submitSearch($event, 'cbx')">
			</vuejx-autocomplete>
			<button class="ml-2 font-semibold text-white px-3 py-2 whitespace-no-wrap leading-none focus:outline-none bg-gray-700 whitespace-no-wrap rounded" tabindex="-1" @click="submitSearch($event)">
			Tìm
			</button>
			<button  @click="doExportExcel()" class=" ml-1 font-semibold text-white bg-gray-700 rounded px-3 py-2 leading-none focus:outline-none whitespace-no-wrap" tabindex="-1">
			Xuất file
			</button>
		  </template>
		  </qlvt-filter>
		</div> 
		<vuejx-table-simple id="table_to_export" :employee__table="true" :pagesize="page" class="border__table" db="CSDL_BacGiang" collection="C_PhuongXa" :sort="[ { 'createdAt': 'desc' } ]" :keywords="keywordsCfg" :queryFilter="re_calculator" @init="initPhuongXa">
		  <template v-slot:thead >
			<tr class="">
			  <th rowspan="2" class="font-semibold text-center flex-1 p-2 bg-green-100 text-green-300" 
			  style="width: 50px;max-width: 50px;font-weight: 700">
			  STT
			  </th>
			  <th rowspan="2" class="font-semibold text-center flex-1 p-2 bg-green-100 text-green-300" 
			  style="width: 200px;max-width: 200px;font-weight: 700;">
			  Tên xã
			  </th>
			  <th colspan="4" class="font-semibold text-center flex-1 p-2 bg-green-100 text-green-300" 
			  style="width: 280px;max-width: 280px;font-weight: 700">
			  Nhà văn hóa xã
			  </th>
			  <th colspan="2" class="font-semibold text-center flex-1 p-2 bg-green-100 text-green-300" 
			  style="width: 140px;max-width: 140px;font-weight: 700">
			  Sân bóng đá xã
			  </th>
			  <th rowspan="2" class="font-semibold text-center flex-1 p-2 bg-green-100 text-green-300" 
			  style="width: 100px;max-width: 100px;font-weight: 700">
			  Tủ sách cấp Xã
			  </th>
			  <th rowspan="2" class="font-semibold text-center flex-1 p-2 bg-green-100 text-green-300" 
			  style="width: 100px;max-width: 100px;font-weight: 700">
			  Thư viện cấp Xã
			  </th>
			  <th rowspan="2" class="font-semibold text-center flex-1 p-2 bg-green-100 text-green-300" 
			  style="width: 100px;max-width: 100px;font-weight: 700">
			  Tăng âm loa đài
			  </th>
			  <th rowspan="2" class="font-semibold text-center flex-1 p-2 bg-green-100 text-green-300" 
			  style="width: 300px;max-width: 300px;font-weight: 700">
			  Ghi chú
			  </th>
			  <th rowspan="2" class="font-semibold text-center flex-1 p-2 bg-green-100 text-green-300" 
			  style="width: 70px; max-width: 70px; font-weight: 700;" v-if="showThaoTac">
			  Thao tác
			  </th>
			</tr>
			<tr class="">
				<th class="font-semibold text-center flex-1 p-2 bg-green-100 text-green-300" style="width: 70px;max-width: 70px">Diện tích (m²)</th>
				<th class="font-semibold text-center flex-1 p-2 bg-green-100 text-green-300" style="width: 70px;max-width: 70px">Số chỗ ngồi</th>
				<th class="font-semibold text-center flex-1 p-2 bg-green-100 text-green-300" style="width: 70px;max-width: 70px">Năm đưa vào sử dụng</th>
				<th class="font-semibold text-center flex-1 p-2 bg-green-100 text-green-300" style="width: 70px;max-width: 70px">Đạt chuẩn theo quy định của Bộ VHTTDL ( có / không)</th>
				<th class="font-semibold text-center flex-1 p-2 bg-green-100 text-green-300" style="width: 70px;max-width: 70px">Số lượng</th>
				<th class="font-semibold text-center flex-1 p-2 bg-green-100 text-green-300" style="width: 70px;max-width: 70px">Diện tích (m²)</th>
			  </tr>
		  </template>
		  <template v-slot:tbody="{ page, data }">
			<tr v-for="(item, key, index) in tableData" v-bind:key="index" class="hover:bg-blue-100 border-b border-gray-200 cursor-pointer text-gray-800">
			  <td class="flex-1 p-2 text-center" style="max-width: 50px;">
				{{ curpage * pageSize - pageSize + index + 1 }}
			  </td>
			  <td class="flex-1 p-2 text-center" style="max-width: 300px;">
				<template v-if="item.highlight && item.highlight['TenXa']">
				  <span v-html="item.highlight['TenXa'].toString()"></span>
				  </template>
				  <template v-else>
				  {{ $parent.objectView(item, 'TenXa') }}
				  </template>             
			  </td>
			  <td class="flex-1 p-2 text-center" style="max-width: 100px;" @change="addCurrent">
				{{ $parent.objectView(item, 'NhaVanHoa.DienTich') }}
			  </td>
			  <td class="flex-1 p-2 text-center" style="max-width: 100px;">
				{{ $parent.objectView(item, 'NhaVanHoa.SoChoNgoi') }}
			  </td>
			  <td class="flex-1 p-2 text-center" style="max-width: 100px;">
				{{ $parent.objectView(item, 'NhaVanHoa.NamSuDung') }}
			  </td>
			  <td class="flex-1 p-2 text-center" style="width: 70px;max-width: 70px;">
				<span v-if="$parent.objectView(item, 'NhaVanHoa.DatChuan') == '01'">Có</span>
				<span v-else>Không</span>
			  </td>
			  <td class="flex-1 p-2 text-center" style="max-width: 100px;">
				{{ $parent.objectView(item, 'SanBong.SoLuong') }}
			  </td>
			  <td class="flex-1 p-2 text-center" style="max-width: 100px;">
				{{ $parent.objectView(item, 'SanBong.DienTich') }}
			  </td>
			  <td class="flex-1 p-2 text-center" style="max-width: 100px;">
				{{ $parent.objectView(item, 'TuSach') }}
			  </td>
			  <td class="flex-1 p-2 text-center" style="max-width: 100px;">
				{{ $parent.objectView(item, 'ThuVien') }}
			  </td>
			  <td class="flex-1 p-2 text-center" style="width: 70px;max-width: 70px;">
				<span v-if="$parent.objectView(item, 'LoaDai.HeThongTangAmLoaDai') == '01'">Có</span>
				<span v-else>Không</span>
			  </td>
			  <td class="flex-1 p-2 text-center" style="max-width: 100px;">
				{{ $parent.objectView(item, 'GhiChu') }}
			  </td>
			  <td class="flex-1 p-2 text-center" style="max-width: 70px;" v-if="showThaoTac"> 
				<i class="mdi mdi-pencil-outline px-1 cursor-pointer text-gray-500" style="font-size: 16px" @click="toDetail(item)" title="Sửa"></i>
							  <i class="mdi mdi-close px-1 text-gray-500" style="font-size: 16px" title="Xóa" @click="deleteRecord(item._id)"></i>
			  </td>
			</tr>
			<tr class="hover:bg-blue-100 border-b border-gray-200 cursor-pointer text-gray-800">
			  <td colspan="2" class="flex-1 p-2 text-center font-semibold" style="max-width: 50px;">
				Tổng cộng
			  </td>
			  <td class="flex-1 p-2 text-center font-semibold" style="width: 80px; max-width: 80px;">
				{{sumNVHDienTich}}
			  </td>
			  <td class="flex-1 p-2 text-center font-semibold" style="width: 80px; max-width: 80px;">
				{{sumNVHSoChoNgoi}}
			  </td>
			  <td class="flex-1 p-2 text-center font-semibold" style="width: 80px; max-width: 80px;">
				
			  </td>
			  <td class="flex-1 p-2 text-center font-semibold" style="width: 80px; max-width: 80px;">
				
			  </td>
			  <td class="flex-1 p-2 text-center font-semibold" style="width: 80px; max-width: 80px;">
				{{sumSBSoLuong}}
			  </td>
			  <td class="flex-1 p-2 text-center font-semibold" style="width: 80px; max-width: 80px;">
				{{sumSBDienTich}}
			  </td>
			  <td class="flex-1 p-2 text-center font-semibold" style="width: 80px; max-width: 80px;">
				{{sumTuSach}}
			  </td>
			  <td class="flex-1 p-2 text-center font-semibold" style="width: 80px; max-width: 80px;">
				{{sumThuVien}}
			  </td>
			  <td class="flex-1 p-2 text-center font-semibold" style="width: 80px; max-width: 80px;">
				
			  </td>
			  <td class="flex-1 p-2 text-center font-semibold" style="width: 80px; max-width: 80px;">
				
			  </td>
			  <td class="flex-1 p-2 text-center font-semibold" style="width: 80px; max-width: 80px;">
				
			  </td>
			</tr>
		  </template>
		</vuejx-table-simple>
	  </v-flex>
	</v-layout>
  </div>
  `,
  data: () => ({
	showThaoTac: true,
	filter: {},
	keywords: '',
	hideFilter: true,
	curpage: 1,
	storage: 'regular',
	sumNVHDienTich: 0,
	  sumNVHSoChoNgoi: 0,
	  sumSBSoLuong: 0,
	  sumSBDienTich: 0,
	  sumThuVien: 0,
	keywordsCfg: [
	'MaMuc.raw',
	'TenMuc.raw'
	],
	re_calculator: [{
	key: 'CapQuanLy._source.MaMuc',
	relation: 'eq'
	},
	{
	key: 'TenMuc',
	relation: 'eq'
	}, ],
	pageSize: 15,
	loadingSubmit: false,
	selectedItem: 0,
	ascQuery: '',
	descQuery: '',
	tableData: {},
	renderDetail: false,
	renderReport: false,
	queryData: [],
	dataReport: {},
	tableSum: {},
	
  }),
  mounted: function() {
	let vm = this;
	vm.$nextTick(async function() {
	const newRoute = window.Vue.router.currentRoute.value;
	vm.keywords = newRoute.query['keywords'] ? newRoute.query['keywords'] : '';
	vm.hideFilter = newRoute.query['hideFilter'] == 'true';
	vm.descQuery = newRoute.query['_desc'] ? newRoute.query['_desc'] : '';
	vm.ascQuery = newRoute.query['_asc'] ? newRoute.query['_asc'] : '';
	await vm.clean();
	vm.curpage = newRoute.query['_page'] || 1;
	vm.pageSize = newRoute.query['_rows'] || 15;
	 vm.init();
	})
  },
  watch: {
	'$route': function(newRoute, oldRoute) {
	this.keywords = newRoute.query['keywords'] ? newRoute.query['keywords'] : '';
	this.hideFilter = newRoute.query['hideFilter'] == 'true';
	this.descQuery = newRoute.query['_desc'] ? newRoute.query['_desc'] : '';
	this.ascQuery = newRoute.query['_asc'] ? newRoute.query['_asc'] : '';
	this.curpage = newRoute.query['_page'] || 1;
	this.pageSize = newRoute.query['_rows'] || 15;
	 this.init();
	}
  },
  methods: {
	init() {
	let vm = this;
	vm.renderDetail = false;
	setTimeout(()=> {
	  this.renderDetail = true;
	}, 0)
	},
	async doExportExcel() {
	this.showThaoTac = false;
	this.showTong = false;
	await this.$parent.exportExcel('table_to_export', 'DanhSachThietCheVanHoa', 'DanhSachThietCheVanHoa', 'xlsx');
	setTimeout(() => {
	  this.showThaoTac = true;
	  this.showTong = true;
	}, 3000)
	
	},
	async submitData(action) {
	let vm = this;
	if (action == 'xoa') {
	  vm.vuejxData['storage'] = 'trash'
	}
	vm.vuejxData['PostDB'] = "CSDL_BacGiang";
	vm.vuejxData['PostCollection'] = "T_ThietCheVanHoa";
	await vm.$parent.submitData(vm.vuejxData, true);
	let detailPage = window.Vue.router.currentRoute.value.params.page;
	setTimeout(() => {
	  window.Vue.redirect([{
	  key: "_id",
	  value: ''
	  }], false, detailPage.replace('_sua', ''))
	}, 2000)
	},
	async clean() {
	let vm = this;
	this.renderDetail = false;
	setTimeout(() => {
	  this.renderDetail = true;
	}, 0)
	},
	addCurrent: function(e){
	var totCurrent = document.getElementById("totCurrent");
	totCurrent.innerHTML = parseInt(e.target.value)
	},
	toDetail(xa) {
	console.log(xa)
	// let curPage = window.Vue.router.currentRoute.value.params.page;
	if (xa._id) {
	window.Vue.redirect([{
	key: "_id",
	value: xa._id,
	}], false, 'tcvh_caphuyen_xa_sua')
	}
	else {
	window.Vue.redirect([{
	  key: "MaXa",
	  value: xa.MaXa,
	}, {
	  key: "TenXa",
	  value: xa.TenXa,
	},  ], false, 'tcvh_caphuyen_xa_sua')
	}
	},
	async deleteRecord(id) {
	let vm = this;
	let r = confirm('Bạn muốn xoá bản ghi này?');
	if (r) {
	  let data = {
		_id: id,
		
		ThuVien: 0,
		'NhaVanHoa.DatChuan': '00',
		'LoaDai.HeThongTangAmLoaDai': '00',
		'NhaVanHoa.DienTich': 0,
		'NhaVanHoa.SoChoNgoi': 0,
		'NhaVanHoa.NamSuDung': 0,
		'SanBong.SoLuong': 0,
		'SanBong.DienTich': 0,
		GhiChu: 0
	  }
	  data['PostDB'] = "CSDL_BacGiang";
	  data['PostCollection'] = "T_ThietCheVanHoa";
	  await vm.$parent.submitData(data, true);
	  vm.renderDetail = false;
	  setTimeout(() => {
	  vm.renderDetail = true
	  }, 600)
	}
	},
	async initPhuongXa(data) {
	  let vm = this;
	  vm.tableData = {}
	  let condition = []
	  console.log(data)
	  if (Array.isArray(data) && data.length > 0) {
		for (let xa of data) {
		condition.push({
		match: {
		'PhuongXa._source.MaMuc' : xa._source.MaMuc
		}
		})
		vm.tableData[xa._source.MaMuc] = {
		  MaXa: xa._source.MaMuc,
		  TenXa: xa._source.TenMuc,
		}
		}
		//searchElastic(db, collection, condition, includes, size)
		let lstThietCheVanHoa = await vm.searchElastic('CSDL_BacGiang', 'T_ThietCheVanHoa', [
		{
		bool: {
		should: condition
		}
		}], '', 10)
		console.log('dsadasdasdasd',lstThietCheVanHoa)
		for (let thietChe of lstThietCheVanHoa) {
		console.log(thietChe)
		//vm.tableData['GhiChu'] = 
		if (vm.tableData[vm.$parent.objectView(thietChe, '_source.PhuongXa._source.MaMuc')]){
		vm.tableData[vm.$parent.objectView(thietChe, '_source.PhuongXa._source.MaMuc')] = {
		...vm.tableData[vm.$parent.objectView(thietChe, '_source.PhuongXa._source.MaMuc')],
		...thietChe._source,
		_id: thietChe._id,
		}
		}
		}
	  
	  } 
	  let arrItem = Object.values(vm.tableData)
		for(let i=0; i<arrItem.length; i++){
  
		  if(arrItem[i].ThuVien!== undefined)
		  vm.sumThuVien +=  parseInt(arrItem[i].ThuVien)
  
		  if(arrItem[i].NhaVanHoa.DienTich!== undefined)
		  vm.sumNVHDienTich +=  parseInt(arrItem[i].NhaVanHoa.DienTich)
  
		  if(arrItem[i].NhaVanHoa.SoChoNgoi!== undefined)
		  vm.sumNVHSoChoNgoi +=  parseInt(arrItem[i].NhaVanHoa.SoChoNgoi)
  
		  if(arrItem[i].SanBong.DienTich!== undefined)
		  vm.sumSBDienTich +=  parseInt(arrItem[i].SanBong.DienTich)
  
		  if(arrItem[i].SanBong.SoLuong!== undefined)
		  vm.sumSBSoLuong +=  parseInt(arrItem[i].SanBong.SoLuong)
  
	  }
	},
	async searchElastic(db, collection, condition, includeField, size, aggs, sort) {
	  const query = `query search($token: String, $body: JSON, $db: String, $collection: String) {
	  results: search(token: $token, body: $body, db: $db, collection: $collection )
	  }`
	  const queryAggs = `query search($token: String, $body: JSON, $db: String, $collection: String) {
	  results: aggs(token: $token, body: $body, db: $db, collection: $collection )
	  }`
	let bodyQuery = {
	  "size": aggs ? 0 : (size || 100),
	  sort: sort || [{
	  'createdAt': 'desc'
	  }],
	  "query": {
	  "bool": {
	  "filter": [{
		"match": {
		"site": 'bac_giang'
		}
	  },{
		"match": {
		"storage": 'regular'
		}
	  }],
	  "must": condition
	  }
	  },
	};
	if (aggs) {
	  bodyQuery['aggs'] = aggs;
	}
	if (includeField) {
	  bodyQuery['_source'] = {
	  "includes": includeField
	  }
	}
	let postData = {
	  query: aggs ? queryAggs : query,
	  variables: {
	  body: bodyQuery,
	  db: db,
	  collection: collection.toLowerCase(),
	  }
	}
	return await this.$root.$store.dispatch('vuejx_manager/graphqlQuery', postData).then(response => {
	  if (aggs) {
	  if (response.results) {
	  return response.results.aggregations;
	  }
	  }
	  else if (response.results && response.results.hits) {
	  return response.results.hits.hits;
	  }
	  else return;
	  }).catch(err => {
		console.log(err);
		return;
	  });
	},
  },
  computed: {
	permission() {
	const user = JSON.parse(localStorage.getItem('user')) || {};
	let userRoles = [
	...(user['role'] || []),
	...(user['userRolesSub'] || [])
	];
	let permission = userRoles.indexOf('DonViQuanLy') >= 0 ? '2' : '0';
	this.user = user;
	return permission;
	},
  }
  
}