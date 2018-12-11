import util from '@/services/util'

const article = {
  get: async (params = {}, page = 1, limit = 5) => {
    params.page = page
    params.include = 'category,user'
    params.limit = limit
    // console.log(params)
    return await util.api({url: 'articles', data: params})
  },
  show: async (id) => {
    let response = await util.api({url: 'show/' + id})
    // console.log(response)
    return response
  }
}
export default article
