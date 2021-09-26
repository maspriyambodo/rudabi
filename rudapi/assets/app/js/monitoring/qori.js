var Qori = {
    FirstLoad: true,
    GetData: function() {
        console.log('test saja');
    },
    PopulateData: function(data) {

    },
    Init: function() {
        var $self = this;
        if($self.FirstLoad) {
            $self.FirstLoad = false;
            $self.GetData();
        }
    }
};