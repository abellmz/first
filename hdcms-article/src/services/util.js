import wepy from 'wepy'

const host = 'http://abellmz.cn/api'
const util = {
  // 发送异步请求
  api: async (options) => {
    // console.log(options)
    options.url = host + '/' + options.url
    // console.log(options)
    wepy.showLoading({title: '加载中'})
    let response = await wepy.request(options)
    // console.log(options)
    wepy.hideLoading()
    // console.log(response)
    return response
  },
  login: async (options) => {
    //  赋予属性
    options.url = 'login'
    options.method = 'POST'
    // console.log(options)
    let response = await util.api(options)
    // console.log(response)
    // 判断运行是否正常
    if (response.statusCode === 200) {
      //                                 得到现在时间       令牌过期时间（s为单位）
      response.data.expires_in = new Date().getTime() + response.data.expires_in * 1000
      // console.log(response.data.expires_in)
      wepy.setStorageSync('token', response)
    }
    return response
  },
  //  判断令牌时间是否过期
  getToken: () => {
    let token = wepy.getStorageSync('token')
    if (token) {
      return token.data.expires_in > new Date().getTime() ? token.data.access_token : null
    }
  },
  //  给options赋值
  authApi: async (options) => {
    options.url = host + '/' + options.url
    options.header = options.header ? options.header : {}
    options.header.Authorization = 'Bearer ' + util.getToken()

    let response = await wepy.request(options)
    return response
  },
  //  注销 登录
  logout: async () => {
    let response = await util.authApi({url: 'logout'})
    if (response.statusCode === 200) {
      wepy.removeStorageSync('token')
    }
    return response
  }
}
export default util
