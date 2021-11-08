function timer(expiry) {
    return {
      expiry: expiry,
      remaining:null,
      timer : null,
      init() {
        this.setRemaining()
        this.timer = setInterval(() => {
          this.setRemaining();
        }, 1000);
      },
      setRemaining() {
        const diff = this.expiry - new Date().getTime();
        this.remaining =  parseInt(diff / 1000);
        if(!this.remaining){
          this.userDepositTimeExpired();
        }
      },
      days() {
        return {
            value:this.remaining / 86400,
          remaining:this.remaining % 86400
        };
      },
      hours() {
        return {
            value:this.days().remaining / 3600,
          remaining:this.days().remaining % 3600
        };
      },
      minutes() {
          return {
            value:this.hours().remaining / 60,
          remaining:this.hours().remaining % 60
        };
      },
      seconds() {
          return {
            value:this.minutes().remaining,
        };
      },
      format(value) {
        return ("0" + parseInt(value)).slice(-2)
      },
      time(){
          return {
            days:this.format(this.days().value),
          hours:this.format(this.hours().value),
          minutes:this.format(this.minutes().value),
          seconds:this.format(this.seconds().value),
        }
      },
      userDepositTimeExpired(){
          clearInterval(this.timer);
          fetch('/timeelapsed', {
            method: 'GET',
          })
          .then (res => {
            console.log(res.data);
          });
      }
    }
  }
  