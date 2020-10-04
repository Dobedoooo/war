let filter = {

    formatTime: (time, spliter) => {

        var date = new Date(time * 1000)
      
        return [date.getFullYear(), date.getMonth(), date.getDate()].join(spliter);

    }
      
}

export default filter;