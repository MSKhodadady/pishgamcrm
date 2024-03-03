/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.2
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Ondemand Commercial
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

var Detail_PBXManager_Js = {
    showModal: function (requrl) {
        app.helper.showProgress();
        app.request.get({url: requrl}).then(function (err, data) {
            app.helper.hideProgress();
            if (err === null) {
                app.helper.showModal(data);
            }
        });
    },
    openWindow: function (url) {
        window.open(url,'_blank');
    },
};
