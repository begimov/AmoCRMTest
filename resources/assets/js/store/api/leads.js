export default {
    getLeads() {
      return new Promise((resolve, reject) => {
        axios.get('/leads').then(res => {
            resolve(res);
        }).catch(err => {
            reject(err);
        });
      })
    }
  }