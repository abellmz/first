import util from '@/services/util'

const category = {
  get: async (limit = 5) => {
    return await util.api({url: 'categories', data: {limit: limit}})
  }
}
export default category
