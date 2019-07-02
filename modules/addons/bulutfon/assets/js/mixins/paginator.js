  var paginator = {
    methods: {
        getDate: function(rdate) {
            var ndate = new Date(Date.parse(rdate));
            
            if (!isValidDate(ndate)) {
                return '-'
            }
            var month = (parseInt(ndate.getMonth()) +1).pad(2) ;

            return ndate.getDate().pad(2)+'.'+month+'.'+ ndate.getFullYear()+' ' + ndate.getHours().pad(2)+':'+ndate.getMinutes().pad(2)+':'+ ndate.getSeconds().pad(2)
        },
        getStreamUrl: function(item) {
            return "https://api.bulutfon.com/call-records/"+item.uuid+"/stream?access_token="+this.token;
        },
        getUrl: function(params, endpoint) {
            
            var urlParams = '';
            var urlEndpoint = this.endpoint
            if (endpoint !== undefined) {
                urlEndpoint = endpoint;
            }
            if (params === undefined) {
                urlParams = '';
            }else {
                if (this.phonenumber) {
                    params['caller'] = this.phonenumber;
                }
                for (var key in params) {
                    urlParams += '&'+key+'='+params[key];
                }
            }
            return this.apiUrl + urlEndpoint + '?access_token=' + this.token+urlParams;
        },
        
        isExists: function(number) {
            if (number in this.searchResults) {
                return this.searchResults[number];
            }
            return false;
        },
        getUserInfo: function (number, property) {
            return this.searchResults[number][0][property];
        },
        getNumberCount: function (number) {
            return this.searchResults[number].length;
        },
        getUser: function (number) {
            return this.searchResults[number];
        },
        getPage: function(page) {
            var that = this;
            this.loading = true;
            axios.get(this.getUrl({limit: this.perpage, page: page}))
                .then(function (response) {
                    that.loading = false;
                    that.items = response.data[that.endpoint];
                    that.page = page;
                    that.total = response.data[that.paginatorName].total_pages;
                    that.numbers
                    that.searchNumbers();
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(function () {
                    // always executed
                });
        },
        extractNumbers: function () {
            var numbers = [];
            for (var key in this.items) {
                var nLength = this.items[key][this.itemKey].toString().length;
                if (nLength > 10) {
                    numbers.push(this.items[key][this.itemKey])
                }
            }
            return numbers;
        },
        searchNumbers: function() {
            var numbers = this.extractNumbers();
            var that = this;
            axios.post('addonmodules.php?module=bulutfon&action=home&work=numbers', {
                numbers: numbers
            })
            .then(function (response) {
                
                that.searchResults = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        getPage: function(page) {
            var that = this;
            this.loading = true;
            axios.get(this.getUrl({limit: this.perpage, page: page}))
                .then(function (response) {
                    that.loading = false;
                    that.items = response.data[that.endpoint];
                    that.page = page;
                    that.total = response.data[that.paginatorName].total_pages;
                    that.numbers
                    that.searchNumbers();
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(function () {
                    // always executed
                });
        },
        
        extractNumbers: function () {
            var numbers = [];
            for (var key in this.items) {
                var nLength = this.items[key][this.itemKey].toString().length;
                if (nLength > 10) {
                    numbers.push(this.items[key][this.itemKey])
                }
            }
            return numbers;
        },
        searchNumbers: function() {
            var numbers = this.extractNumbers();
            var that = this;
            axios.post('addonmodules.php?module=bulutfon&action=home&work=numbers', {
                numbers: numbers
            })
            .then(function (response) {
                
                that.searchResults = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
    },
    computed: {
        previous: function() {
            var page = parseInt(this.page)
            return page > 1 ?  page - 1 : 1;
        },
        next: function() {
            var page = parseInt(this.page)
            return page +1;
        }
    },
    mounted: function () {
        this.getPage(1);
    }
};