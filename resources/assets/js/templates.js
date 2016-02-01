this["Shards"] = this["Shards"] || {};
this["Shards"]["character"] = this["Shards"]["character"] || {};
this["Shards"]["character"]["currentmission"] = Handlebars.template({"compiler":[7,">= 4.0.0"],"main":function(container,depth0,helpers,partials,data) {
    var helper, alias1=depth0 != null ? depth0 : {}, alias2=helpers.helperMissing, alias3="function", alias4=container.escapeExpression;

  return "<div>\n    "
    + alias4(((helper = (helper = helpers.name || (depth0 != null ? depth0.name : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"name","hash":{},"data":data}) : helper)))
    + "\n    "
    + alias4(((helper = (helper = helpers.description || (depth0 != null ? depth0.description : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"description","hash":{},"data":data}) : helper)))
    + "\n\n    "
    + alias4(((helper = (helper = helpers.finish_at || (depth0 != null ? depth0.finish_at : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"finish_at","hash":{},"data":data}) : helper)))
    + "\n</div>\n";
},"useData":true});