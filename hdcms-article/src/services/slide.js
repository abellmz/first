import util from '@/services/util'

const slide = {
  get: async (limit = 10) => {
    // console.log(limit)
    return await util.api({url: 'flashs', data: {limit: limit}})
  }
}
export default slide
